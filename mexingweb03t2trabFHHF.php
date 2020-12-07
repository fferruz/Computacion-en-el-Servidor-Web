<?php error_reporting (E_ALL ^ E_NOTICE);

/**********************************************************
Creado por: Francisco Humberto Hernández Ferruz
Fecha: 05/12/2020
----------------------------------------------------------
Maestría en Ingeniería de Software y Sistemas Informáticos
Materia: Computación en el servidor web
Impartido por: Octavio Aguirre Lozano
Trabajo: Desarrollo web avanzado
***********************************************************/

/**
 *  En la presente página simularemos una búsqueda de usuarios con diferentes criterios
 *  para cumplir con los objetivos de la actividad solicitada:
 * 
 *  Descripción del trabajo
 *
 *  En esta actividad se propone desarrollar una página web en PHP de temática libre. 
 *  El desarrollo se hará poniendo en práctica los conceptos estudiados en los dos primeros temas. 
 *  
 * 
 * 
 * Por tanto, los requisitos cumplidos serían los siguientes:
 *
 *  »	Una estructura de control de cada tipo que hemos estudiado.
 *  »	Una función.
 *  »	Un array o matriz.
 *  »	Uso de alguna función de cadenas (ver apartado 2.5 del Tema 2)
 *  »	Uso de objetos
 * 
 */

?>

<?php

// Declaración de variables globales de Objeto User
Global $objUser1;
Global $objUser2;
Global $objUser3;
Global $objUser4;
Global $objUser5;
Global $objUser6;
Global $objUser7;
Global $objUser8;
?>


<?php
    // Declaración de clase de usuario
    class User{    

        /**
         *  Nombre del usuario
         */
        protected $name;
        /**
         * Apellidos del usuario
         */
        protected $lastName;
        /**
         * Edad del usuario
         */
        protected $age;
        /**
         * Estado civil del usuario
         */
        protected $maritalStatus;
        
        // Constructor de la clase
        function __construct($name, $lastName, $age, $maritalStatus){     
            $this -> name = $name;     
            $this -> lastName = $lastName;
            $this -> age = $age;
            $this -> maritalStatus = $maritalStatus;
        }

       
        //Setters    
        function set_name($name){      
            $this->name = $name;    
        }    
        
        function set_lastName($lastName){      
            $this->lastName = $lastName;    
        }

        function set_age($age){      
            $this->age = $age;    
        }

        function set_maritalstatus($maritalStatus){      
            $this->maritalstatus = $maritalStatus;    
        }
        
        //Getters    
        function get_name(){      
            return $this->name;    
        }    
        
        function get_lastName(){      
            return $this->lastName;    
        }    
        
        function get_age(){      
            return $this->age;    
        }

        function get_maritalStatus(){      
            return $this->maritalStatus;    
        }

        //Metodos    
        
        // Uso de funciones
        function loadData(){

            // Recolectamos variables del formulario
            $fSearch = htmlspecialchars($_POST['search']);
            $fName = htmlspecialchars($_POST['name']);
            $fAge = (int)$_POST['age'];
            $fEdoCiv = htmlspecialchars($_POST['edociv']);
            $fSigno = htmlspecialchars($_POST['optAge']);
            

            // Creamos Repositorio de Datos de prueba
            $objUser1 = new User('Francisco Humberto', 'Hernández Ferruz', 30, 'S');
            $objUser2 = new User('Franklin', 'Castellanos Romero', 21, 'S');
            $objUser3 = new User('Michel', 'Hernández Palacios', 19, 'S');
            $objUser4 = new User('Iker', 'Hernández Toledo', 10, 'S');
            $objUser5 = new User('Juan', 'Gutierrez Calva', 56, 'C');
            $objUser6 = new User('Maria de los Angeles', 'Rubio Martinez', 17, 'S');
            $objUser7 = new User('Carmen', 'Campuzano', 16, 'S');
            $objUser8 = new User('Miguel', 'Hernández Rodriguez', 20, 'C');
            
            $vector = array ($objUser1, $objUser2, $objUser3, $objUser4, $objUser5, $objUser6, $objUser7, $objUser8);
  


            $array_num = count($vector);

            $fFound = "Búsqueda por ";

            echo "<font face=Roboto size=2px>";

            echo "<table width=70% border=1 align=center>";
            echo "<tr>";
            echo "<td> Nombres </td>";
            echo "<td> Apellidos </td>";
            echo "<td> Estado Civil </td>";
            echo "<td> Edad </td>";
            echo "</tr>";

            // Estructura de control
            switch ($fSearch) {
                case 'byName':      // Busqueda por Nombre

                    $fFound = $fFound . "Nombre: <b>" . $fName . "</b>";
                    
                    // Estructura de control repetitiva
                    for ($i = 0; $i < $array_num; ++$i){
                        
                        // Validación para campo nombre vacio
                        if ($fName == ''){              // Si el campo viene vacio devuelve todos los registros sin restricción
                            print "<tr>";
                            print "<td>" . $vector[$i]->get_name() . "</td>";
                            print "<td>" . $vector[$i]->get_lastName() . "</td>";
                            print "<td>" . $vector[$i]->get_maritalStatus() . "</td>";
                            print "<td>" . $vector[$i]->get_age() . "</td>";
                            print "</tr>";
                        }else if (strpos($vector[$i]->get_name(), $fName) !== false){       // Si escribimos algo se realiza la busqueda x criterio
                            print "<tr>";
                            print "<td>" . $vector[$i]->get_name() . "</td>";
                            print "<td>" . $vector[$i]->get_lastName() . "</td>";
                            print "<td>" . $vector[$i]->get_maritalStatus() . "</td>";
                            print "<td>" . $vector[$i]->get_age() . "</td>";
                            print "</tr>";
                        }
                    }
                    break;

                case 'byAge':

                    $fFound = $fFound . "Edad: <b>" . $fAge . "</b>";

                    for ($i = 0; $i < $array_num; ++$i){
                        if ($fSigno == 0 and $vector[$i]->get_age() > $fAge){
                            print "<tr>";
                            print "<td>" . $vector[$i]->get_name() . "</td>";
                            print "<td>" . $vector[$i]->get_lastName() . "</td>";
                            print "<td>" . $vector[$i]->get_maritalStatus() . "</td>";
                            print "<td>" . $vector[$i]->get_age() . "</td>";
                            print "</tr>";
                        }elseif ($fSigno == 1 and $vector[$i]->get_age() < $fAge) {
                            print "<tr>";
                            print "<td>" . $vector[$i]->get_name() . "</td>";
                            print "<td>" . $vector[$i]->get_lastName() . "</td>";
                            print "<td>" . $vector[$i]->get_maritalStatus() . "</td>";
                            print "<td>" . $vector[$i]->get_age() . "</td>";
                            print "</tr>";
                        }
                        
                    }
                    break;

                case 'byedociv':    // Búsqueda por estado civil [Soltero S - Casado C]

                    $fFound = $fFound . "Edo. Civil: <b>" . $fEdoCiv . "</b>";
                    
                    for ($i = 0; $i < $array_num; ++$i){

                            if ($vector[$i]->get_maritalStatus() === "C" and $fEdoCiv === "married"){
                                print "<tr>";
                                print "<td>" . $vector[$i]->get_name() . "</td>";
                                print "<td>" . $vector[$i]->get_lastName() . "</td>";
                                print "<td> Casado </td>";
                                print "<td>" . $vector[$i]->get_age() . "</td>";
                                print "</tr>";
                            }elseif ($vector[$i]->get_maritalStatus() === "S" and $fEdoCiv === "single"){
                                print "<tr>";
                                print "<td>" . $vector[$i]->get_name() . "</td>";
                                print "<td>" . $vector[$i]->get_lastName() . "</td>";
                                print "<td> Soltero </td>";
                                print "<td>" . $vector[$i]->get_age() . "</td>";
                                print "</tr>";
                            }
                    }
                    break;
                
                default:
                    for ($i = 0; $i < $array_num; ++$i){
                        //print_r ($vector[$i]);
                        print "<tr>";
                        print "<td>" . $vector[$i]->get_name() . "</td>";
                        print "<td>" . $vector[$i]->get_lastName() . "</td>";
                        // Estructura de control
                        if ($vector[$i]->get_maritalStatus() === 'C')
                            print "<td> Casado </td>";
                        else
                            print "<td> Soltero </td>";
                        print "<td>" . $vector[$i]->get_age() . "</td>";
                        print "</tr>";
                    }
                    break;
            }
            echo "</tr>";
            echo "<tr>";
            echo "<td colspan=4>";
            echo $fFound;
            echo "</td>";
            echo "</tr>";
            echo "</table>";
            echo "<br>";
           
            echo "</font>";
            
        }
    }  

    (new User('','',0,''))->loadData();
   
?>

<html>
<head>
<title></title>    
</head>

<body bgcolor="#D0D0D0">
<br>
<br>
<font face="Roboto" size="1">
<form action="" method="post">
    <table align="center">
    <tr>
        <td> <input type="radio" id="byName" name="search" value="byName"> </td>
        <td> Nombre</td>
        <td> <input type="text" size="40" id="name" name="name"/> </td>
    </tr>
    <tr>
        <td> <input type="radio" id="byage" name="search" value="byAge"> </td>
        <td> Edad </td>
        <td> <select id="optAge" name="optAge">
                <option value="0">></option>
                <option value="1"><</option>
             </select> 
             <input type="number" id="age" name="age"> 
        </td>
    </tr>
    <tr>
        <td> <input type="radio" id="byedociv" name="search" value="byedociv"> </td>
        <td> Edo. Civil</td>
        <td>  
            <select id="edociv" name="edociv">
            <option value="single">Soltero</option>
  <option value="married">Casado</option>
</select>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="right"> <input type="submit" value="Buscar"> </td>
        </tr>
        
        <tr>
            <td colspan="3" bgcolor="grey"> 
            
                <h3>
                
                    Opciones de búsqueda <br>
                    Por Nombre: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ingrese un nombre para realizar la búsqueda <br>
                    Por Edad: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Elija si la busqueda sera Mayor o Menor e ingrese la edad a partir de donde buscar <br>
                    Por Estado Civil: Elija el estado Civil Soltero o Casado para realizar la búsqueda
                
                </h3>
            </td>
        </tr>
    </table>
</form>
</font>
</<body>
</html>
