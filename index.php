<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css"
        integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/estilo.css">

    <div class="park">
        <div class="row">
            <div class="col-md-6">
                <h1>Control Ingreso Parqueadero</h1>

                <form method="post" action="/ejerciciocrud/crud/php/crear.php" class="form">
                <label for="id">Id:</label>
                <input class="id" type="text" name="id" value="" /> <br>
                <label for="receptor">Receptor:</label>
                <input class="receptor" type="text" name="receptor" placeholder="receptor"/><br>
                <label for="placa">Placa:</label>
                <input class="placa" type="text" name="placa" placeholder="placa"/><br>
                <label for="hora_entrada">Hora de ingreso:</label>
                <input class="hora_entrada" type="text" name="hora_entrada" placeholder="hora de entrada"/><br>
                <label for="hora_salida">Hora de salida:</label>
                <input class="hora_salida" type="text" name="hora_salida" placeholder="hora de salida"/><br>
                <label for="valor_pagar">Valor a pagar:</label>
                <input class="valor_pagar" type="double" name="valor_pagar" placeholder="valor a pagar"/><br><br>

                <select class="operacion">
                    <option >Escoje una opcion</option>
                    <option value="insertar">insertar</option>
                    <option value="actualizar">actualizar</option>
                    <option value="eliminar">eliminar</option>
                    </select>
                    
                <input  type="submit" value="Enviar" class="boton">
                </form>
            </div>
         
                  
            <div class="col-md-6">
            <table class="tabla">
                    <tr>
                        <td>id</td>
                        <td>Receptor</td>
                        <td>Placa</td>
                        <td>Hora de entrada</td>
                        <td>Hora de salida</td>
                        <td>Valor a pagar</td>
                    </tr>
            </div>
        
        </div>

            <?php
            $host="localhost";
            $user="root";
            $pass="";
            $db="parqueadero";
            $conn=mysqli_connect($host,$user,$pass,$db);

            $sql="SELECT * FROM parqueadero1";

            $query=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['receptor'];?></td>
                <td><?php echo $row['placa'];?></td>
                <td><?php echo $row['hora_entrada'];?></td>
                <td><?php echo $row['hora_salida'];?></td>
                <td><?php echo $row['valor_pagar'];?></td>
            </tr>  
            <?php 
            }
            ?>
        </table>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>

        jQuery(Document).ready(function($){
            alert("Bienvenido al sistema de parqueo");

            $(".tabla tr").click(function() {
                $(".id").val($(this).find("td").eq(0).html());
                $(".receptor").val($(this).find("td").eq(1).html());
                $(".placa").val($(this).find("td").eq(2).html());
                $(".hora_entrada").val($(this).find("td").eq(3).html());
                $(".hora_salida").val($(this).find("td").eq(4).html());
                $(".valor_pagar").val($(this).find("td").eq(4).html());
            });    
        });
        </script>
        <script>
            $(document).ready(function(){
                var $select=$('.operacion');

                $select.on('change', function(){
                    var op=$select.val();

                    console.log(op);

                    if(op=="crear"){
                        $(".form").attr("action","/ejerciciocrud/crud/php/crear.php");
                    }else if(op=="actualizar"){
                        $(".form").attr("action","/ejerciciocrud/crud/php/actualizar.php");
                    }else if(op=="eliminar"){
                        $(".form").attr("action","/ejerciciocrud/crud/php/eliminar.php");
                    }
                });
            });
            

        </script>



    
    

