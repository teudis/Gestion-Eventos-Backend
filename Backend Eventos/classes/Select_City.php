<?php

require_once("./conectorDB.php");
require_once("./Events.php");
$city = $_POST['city'];
$event = new Events;
$result = $event->get_event_city($city);

       if(count($result) > 0)
       {

       		echo  "<div class='panel-heading'> ";
			echo " <h3 class='panel-title'>Events</h3> ";
			echo " <div class='pull-right'> ";
			echo " <button class='btn btn-primary btn-xs btn-filter'><span class='glyphicon glyphicon-filter'></span> Search</button>";
			echo '</div>' ;              
			echo '</div>' ;           
			echo "<table class='table' id='info'>
                <thead>
                    <tr class='filters'>
                        <th><input type='text' class='form-control' placeholder='Event's Name' disabled></th>
                        <th><input type='text' class='form-control' placeholder='Beginning Date' disabled></th>
                        <th><input type='text' class='form-control' placeholder='Ending Date' disabled></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead> <tbody>";
               echo "<tr>";


       			foreach ($result as $fila) {
       				# code...
       			
       					echo '<tr>';
                        echo '<td>' . $fila['name'] . '</td>';
                        echo '<td>' . $fila['date_beg'] . '</td>';
                        echo '<td>' . $fila['date_end'] . '</td>';  
                        echo "<td><p>"."<a  class='show' href=".$fila['id']."><span class='glyphicon glyphicon-file'></span></a></p></td>";
                        echo "<td><p>"."<a class='edit' href=".$fila['id']."><span class='glyphicon glyphicon-pencil'></span></a></p></td>";
                        echo "<td><p>"."<a  class='remove' href=".$fila['id']."><span class='glyphicon glyphicon-trash'></span></a></p></td>";

                  }
                  echo "  </tbody> </table>";

       }
       else
       		echo "No results";
//$category = 1;



?>