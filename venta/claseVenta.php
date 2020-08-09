<?php
    require_once "../funciones/conexion.inc.php";
    

    class ventas {
        function obtenDatosProducto($idProducto){
            $linkConexion = conexionBD();
            $DatosProducto = array();

            $sql="SELECT id_producto, dsc_producto, precio, stock FROM producto where id_producto = $idProducto";
            $result = mysqli_query($linkConexion, $sql);

            $data = mysqli_fetch_array($rs);

            $DatosProducto['ID_PRODUCTO'] = $data['id_producto'];
            $DatosProducto['PRODUCTO'] = $data['dsc_producto'];
            $DatosProducto['PRECIO'] = $data['precio'];
            $DatosProducto['STOCK'] = $data['stock'];

            return $DatosProducto;
        }
    
        public function crearVenta(){
            $linkConexion = conexionBD();

            $fecha = date('Y-m-d');
            $idventa=self::creaFolio();
            $datos=$_SESSION['tablaComprasTemp'];
            $r = 0;

            for ($i = 0; $i < count($datos); $i++) {
                $d = explode('||', $datos[$i]);

                $sql="INSERT INTO venta 
                        (id_venta,
                        id_cliente,
                        id_producto,
                        precio,
                        fecha) 
                    values ('$idventa', 
                            '$d[3]', 
                            '$d[0]', 
                            '$d[2]', 
                            '$fecha')";

                $r = $r + $result = mysqli_query($linkConexion, $sql);
            }
            return $r;
        }


        public function creaFolio(){
            $linkConexion = conexionBD();
            $datosVenta = array();
            
            $sql="SELECT id_venta from venta group by id_venta desc";

            $result=mysqli_query($linkConexion,$sql);
            $id = mysqli_fetch_row($result)[0];
            //$datosVenta['ID']=$data['id_venta'];

            if($id=="" or $id==null or $id==0){
                return 1;
            }else{
                return $id + 1;
            }
        }
    }
?>
