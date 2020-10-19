
 <?php  
/*
 // Database configuration 
$dbHost     = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName     = "urbano1"; 
 
// Create database connection 
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 
// Check connection 
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error); 
} 
 
// Get search term 
$searchTerm = $_GET['term']; 
 
// Fetch matched data from the database 
$query = $db->query("SELECT * FROM predios WHERE clave LIKE '%".$searchTerm."%' AND status = 1 ORDER BY skill ASC"); 
 
// Generate array with skills data 
$skillData = array(); 
if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){ 
        $data['id'] = $row['id']; 
        $data['value'] = $row['skill']; 
        array_push($skillData, $data); 
    } 
} 
 
// Return results as json encoded array 
echo json_encode($skillData); 
*/
 $connect = mysqli_connect("localhost", "root", "", "urbano1");  
 if(isset($_POST["query"]))  
 {  
      $output = '';
      $query ="SELECT id_predio, clave, propietario FROM predios WHERE clave LIKE '%".$_POST["query"]."%'";

//      '%".$_POST["query"]."%'";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      
      $data = array();
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["clave"]. " ". $row["propietario"]. " ". $row["id_predio"].'</li>';
                
                array_push($data, $output);
           }  
      }  
      else  
      {  
           $output .= '<li> Predio no encontrado</li>';  
      }  
      $output .= '</ul>';  
      echo $output;
         // echo json_encode($data);
      //echo json_encode($skillData);

 } 

 ?>