<?php 
    include('config/constants.php');

    if(isset($_GET['id']) && isset($_GET['image_name'])) //Either use '&&' or 'AND'
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name != "")
        {
            $path = "../images/makeup/".$image_name;

            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['upload'] = "<div class='error'>Failed to Remove Image File.</div>";
                header('location:'.SITEURL.'admin/manage-makeup.php');
                die();
            }

        }

        $sql = "DELETE FROM tbl_makeup WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>Makeup Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-makeup.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Makeup.</div>";
            header('location:'.SITEURL.'admin/manage-makeup.php');
        }

        

    }
    else
    {
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-makeup.php');
    }

?>
