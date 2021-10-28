<?php
    include('includes/dbconnection.php');
    $output = '';
    $order = $_POST['order'];
    
    if ($order == 'desc'){

        $order= 'asc';
    }
    else{
        $order = 'desc';
    }
    $sql="SELECT * from tblresident  ORDER BY ".$_POST['column_name']." ".$order.' limit 10';
        
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ); 

    
    $output .= 
    '
    <table class="table bg-white rounded shadow-sm  table-hover table-bordered">
    <thead>
        <tr>
        <th  scope="col">Status</th>
        
        <th   scope="col">Name <span class="float-end"><a  class= "column_sort text-secondary" data-order = "'.$order.'" id = "LastName"> <i id = "sortname" class="fa fa-sort"></i></a></span> </th>

        <th   scope="col">Age <span class="float-end"><a  class= "column_sort text-secondary" data-order = "'.$order.'" id = "BirthDate"> <i id = "sortage" class="fa fa-sort"></i></a></span> </th>

        <th   scope="col">Gender <span class="float-end"><a class= "column_sort text-secondary" data-order = "'.$order.'" id = "Gender"> <i id = "sortgender" class="fa fa-sort"></i></a></span> </th>

        <th   scope="col">Purok <span class="float-end"><a class= "column_sort text-secondary" data-order = "'.$order.'" id = "Purok"> <i id = "sortname" class="fa fa-sort"></i></a></span> </th>
        
        <th   scope="col">Street <span class="float-end"><a  class= "column_sort text-secondary" data-order = "'.$order.'" id = "streetName"> <i id = "sortst" class="fa fa-sort"></i></a></span> </th>
       
        <th   scope="col">Action </th>
        </tr>   
    </thead>
    <tbody>
    ';
    $cnt=1;
    if($query->rowCount() > 0)
    {
        foreach($results as $row){ 
            $output .= '<tr>
                <td  scope="col">
                    <i class ="fa fa-circle link-success me-1"></i>
                    Active
                </td>
        
                <td   scope="col">'.$row->LastName.', '.$row->FirstName.' '.$row->MiddleName.' '.$row->Suffix.'</td>
            ';
            $gbd = $row->BirthDate;
            $gbd = date('Y-m-d', strtotime($gbd));
            $today = date('Y-m-d');
            $diff = date_diff(date_create($gbd), date_create($today));
            
            $output.= '
            <td  class ="small" scope="col">'.$diff->format('%y').'</td>
            ';
            $gend = htmlentities($row->Gender);
            $gen = "fa fa-venus link-danger ";
            if ($gend =="Female"){
                $gen;
            }
            else{
                $gen = "fa fa-mars link-info ";  
         
            }
            
            $output.='<td    scope="col"><i class = "fa '.$gen.' me-2"> </i>'.$gend.'</td>
            <td scope = "col">'.$row->Purok.'</td>
            <td scope = "col">'.$row->streetName.'</td>';

            $output .= '
            
            <td  class ="action" scope="col">
            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                <a href  = "view-resident-personal.php?viewid='.$row->ID.'type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                </div>
                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                    <a type="button" href ="edit-resident-personal.php?editid="'.$row->ID.'" class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Edit</span></a>
                </div>
                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash mx-1"></i><span class= "wal">Delete</button>
                </div>
            </td>
            
            ';



        }
        $cnt++;
    }
    else{
        echo "alaws";
    }

    echo '</tbody>
    </table>';
    echo $output;
   
    
?>