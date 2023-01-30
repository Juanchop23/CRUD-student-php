<?php
session_start();
include './dbcon.php';

?>

<?php
include('./includes/header.php');
?>

<!-- ============ DATOS DEL ESTUDIANTE ============== -->
<div class="container mt-4">

    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Detalles del estudiante
                        <a href="student-create.php" class="btn btn-primary float-end">Añadir estudiantes</a>
                    </h4>
                </div>
                <div class="card-body">

                    <!-- ======= TABLA CON LA INFO ====== -->
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre del estudiante</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Grado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            #TRAYENDO EL REGISTRO
                            $query = "SELECT * FROM students";
                            $query_run = mysqli_query($con, $query);

                            #CHEQUEANDO SI EL REGISTRO EXISTE
                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $student) {
                            ?>
                                    <tr>
                                        <td><?= $student['id']; ?></td>
                                        <td><?= $student['name']; ?></td>
                                        <td><?= $student['email']; ?></td>
                                        <td><?= $student['phone']; ?></td>
                                        <td><?= $student['course']; ?></td>

                                        <!-- ==== BOTONES ==== -->
                                        <td>
                                            <!-- ==== CADA QUE NO CARGUE UNA INTERFAZ, REVISAR LAS LÍNEAS ==== -->
                                            <!-- ==== DONDE SE HAGA EL LLAMADO. EVITAR PONER SIGNOS ==== -->
                                            <!-- ==== DE IGUAL ANTES DEL ID ==== -->
                                            <a href="student-view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm">Ver</a>
                                            <a href="student-edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm">Editar</a>

                                            <form action="code.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_student" value="<?= $student['id']; ?>" class="btn btn-danger btn-sm">Borrar</button>
                                            </form>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<h5>No se encontró el registro</h5>";
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>



<?php
include('./includes/footer.php');
?>