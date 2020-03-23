<?php

namespace App\Controllers;

use App\Core\App;

class CustomersController
{
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        $customers = App::get('database')->selectAll('customer', true);
        return view('customer/index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        $genders = App::get('database')->selectAll('gender', false);
        return view('customer/create', compact('genders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Http $response
     */
    public function store()
    {
        if (!empty($_POST)) {
            $first_name = sanitize($_POST['first_name']);
            $last_name = sanitize($_POST['last_name']);
            $town_name = sanitize($_POST['town_name']);
            $gender_id = sanitize($_POST['gender_id']);

            $insert_customer = App::get('database')->createCustomer(
                'customer',
                strtolower($first_name),
                strtolower($last_name),
                strtolower($town_name),
                $gender_id
            );

            if ($insert_customer) {
                return redirect('/customer');
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

        $customer = App::get('database')->selectOne('customer', $id);

        if (empty($customer)) {
            return redirect('not-found');
        }
        return view('customer/show', ['customer' => $customer[0]]);
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
        $customer = App::get('database')->selectOne('customer', $id);
        $genders = App::get('database')->selectAll('gender', false);
        if (empty($customer)) {
            return redirect('not-found');
        }
        return view('customer/edit', [
            'customer' => $customer[0],
            'genders' => $genders
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Http $response
     */
    public function update()
    {
        if (!empty($_POST)) {
            $id = sanitize($_POST['id']);
            $first_name = sanitize($_POST['first_name']);
            $last_name = sanitize($_POST['last_name']);
            $town_name = sanitize($_POST['town_name']);
            $gender_id = sanitize($_POST['gender_id']);

            $update_customer = App::get('database')->updateCustomer(
                'customer',
                $id,
                strtolower($first_name),
                strtolower($last_name),
                strtolower($town_name),
                $gender_id
            );

            if ($update_customer) {
                return redirect('./show/?id=' . $id);
            }	// return redirect('success');
            else {
                return view('failed');
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

        if (App::get('database')->setIsDeleted('customer', $id)) {
            return redirect('/customer');
        }
        return redirect('not-found');
    }
}
