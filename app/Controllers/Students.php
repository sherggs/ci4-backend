<?php

// Student Name: Ademola Jegede,
// Student ID: 2122998,
// course: Web Technologies


namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\StudentModel;  //use the model created 

class Students extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
    {
        $model = new StudentModel();
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
        $model = new StudentModel();
        $data = $model->find(['id' => $id]);
        if(!$data) return $this->failNotFound('404 not found ');
        return $this->respond($data[0]);
    }

// Student Name: Ademola Jegede,
// Student ID: 2122998,
// course: Web Technologies

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        helper(['form']);
        $rules = [
            'name' => 'required',
            'course' => 'required',
            'about' => 'required' 


        ];
        $data = [
            'name' => $this->request->getVar('name'),
            'course' => $this->request->getVar('course'),
            'about' => $this->request->getVar('about')

        ];
        if(!$this->validate($rules)) return $this->fail($this->validator->getErrors());
        $model = new StudentModel();
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

// Student Name: Ademola Jegede,
// Student ID: 2122998,
// course: Web Technologies

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        helper(['form']);
        $rules = [
            'name' => 'required',
            'course' => 'required',
            'about' => 'required' 


        ];
        $data = [
            'name' => $this->request->getVar('name'),
            'course' => $this->request->getVar('course'),
            'about' => $this->request->getVar('about')

        ];
        if(!$this->validate($rules)) return $this->fail($this->validator->getErrors());
        $model = new StudentModel();
        $findbyid = $model->find(['id' => $id]);
        if(!$findbyid) return $this->failNotFound(' 404 not found ');

        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => null,
            'message'=> [
                'success' => 'Student data updated'
            ]
        ];
        return $this->respond($response);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model = new StudentModel();
        $findbyid = $model->find(['id' => $id]);
        if(!$findbyid) return $this->failNotFound(' 404 not found ');

        $model->delete($id);
        $response = [
            'status' => 200,
            'error' => null,
            'message'=> [
                'success' => 'Student deleted '
            ]
        ];
        return $this->respond($response);
    }
}
