<?PHP
require_once('../model/LogInModel.php');

class Controller{
    public $model;

    public function __construct(){
        $this->model = new LogInModel();
    }

    public function invoke(){
        $result = $this->model->getlogin();

        if($result == 'login'){
            echo "<script>
            alert('Login Success');
            window.location.href='../view/homeScreen.php';
            </script>";
            
            //return '';
        }else{
            echo "<script>
            alert('Invalid User');
            window.location.href='../view/signIn.php';
            </script>";
            //return '';
        }
    }
}
?>