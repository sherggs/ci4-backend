<?php
// Student Name: Ademola Jegede,
// Student ID: 2122998,
// course: Web Technologies


namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\CourseModel;

class Coursework extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        $model = new CourseModel();
        $data = $model->findAll();
        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $model = new CourseModel();
        $data = $model->find(['id' => $id]);
        if(!$data) return $this->failNotFound('404 not found ');
        return $this->respond($data[0]);
    }

 
    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    { helper(['form']);
        $rules = [
            'name' => 'required',
            'course' => 'required',
            'number' => 'required' 


        ];
        $data = [
            'name' => $this->request->getVar('name'),
            'course' => $this->request->getVar('course'),
            'number' => $this->request->getVar('number')

        ];
        if(!$this->validate($rules)) return $this->fail($this->validator->getErrors());
        $model = new CourseModel();
        $model->save($data);
        $response = [
            'status' => 201,
            'error' => null,
            'message'=> [
                'success' => 'new Student added'
            ]
        ];
        return $this->respondCreated($response);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
