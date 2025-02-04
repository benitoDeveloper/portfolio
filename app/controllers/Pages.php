<?php
class Pages extends Controller
{
      public $projectModel;
      public function __construct()
      {
            $this->projectModel = $this->model('Project');
      }
      public function index()
      {
            $data = [
                  'projects' => $this->projectModel->get_projects(),
                  'slides_count' => $this->projectModel->slides_count()
            ];
            $this->view('pages/index',$data);
      }
}
?>