<?php

namespace App\Controllers;

use App\Core\App;

class GendersController
{
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        $genders = App::get('database')->selectAll('gender', false);

        return view('gender/index', compact('genders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        return view('gender/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Http $response
     */
    public function store()
    {
        if (!empty($_POST)) {
            $gender_name = sanitize($_POST['gender_name']);

            $insert_gender = App::get('database')->createGender(
                'gender',
                strtolower($gender_name),
            );

            if ($insert_gender) {
                return redirect('/gender');
            }	// return redirect('success');
            else {
                return view('failed');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @return view
     */
    public function show()
    {
        $id = sanitize(
            $_GET['id']
        );
        $gender = App::get('database')->selectOne('gender', $id);
        if (empty($gender)) {
            return redirect('not-found');
        }
        return view('gender/show', ['gender' => $gender[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return view
     */
    public function edit()
    {
        $id = sanitize(
            $_GET['id']
        );
        $gender = App::get('database')->selectOne('gender', $id);
        if (empty($gender)) {
            return redirect('not-found');
        }
        return view('gender/edit', ['gender' => $gender[0]]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Http $response
     */
    public function update()
    {
        // dd($_POST['gender_name']);
        if (!empty($_POST)) {
            $gender_name = sanitize($_POST['gender_name']);
            $id = sanitize($_POST['id']);

            $update_gender = App::get('database')->updateGender(
                'gender',
                $id,
                strtolower($gender_name),
            );

            if ($update_gender) {
                return redirect('/show/?id=' . $id);
            }	// return redirect('success');
            else {
                return redirect('not-found');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Http $response
     */
    public function destroy()
    {
        $id = sanitize(
            $_GET['id']
        );

        if (App::get('database')->deleteGender('gender', $id)) {
            return redirect('/gender');
        }
        return redirect('not-found');
    }
}
