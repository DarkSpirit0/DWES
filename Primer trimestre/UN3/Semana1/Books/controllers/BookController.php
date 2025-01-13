<<<<<<< HEAD
<?php
require_once 'models/BookModel.php';
require_once 'views/BookView.php';

class BookController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new BookModel();
        $this->view = new BookView();
    }

    public function displayBooks() {
        $books = $this->model->getBooks(); // Obtiene los datos del modelo
        $this->view->render($books); // Pasa los datos a la vista para mostrarlos
    }
}
?>
=======
<?php
require_once 'models/BookModel.php';
require_once 'views/BookView.php';

class BookController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new BookModel();
        $this->view = new BookView();
    }

    public function displayBooks() {
        $books = $this->model->getBooks(); // Obtiene los datos del modelo
        $this->view->render($books); // Pasa los datos a la vista para mostrarlos
    }
}
?>
>>>>>>> 6334e5a (14/11 Semana4)
