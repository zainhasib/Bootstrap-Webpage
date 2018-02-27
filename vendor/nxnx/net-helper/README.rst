Net-helper
==========

Net helper for my specific needs

Installation
------------

.. code-block:: bash

    $ composer require nxnx/net-helper

Usage
-----

.. code-block:: php

    require __DIR__ . '/vendor/autoload.php';
    try {//for easy handling errors
        $net = new NetHelper\Service\Net();

        $curl_version = curl_version();
        $net->setUserAgent('curl/' . $curl_version['version']); //optional

        $page = $net->get('http://localhost/');

        $response = $net->post(//$page contains html code of index page
                'http://localhost/post', ['content' => $page], ['user' => 'foo', 'password' => 'bar']
        );
        var_dump($page, $response);
    } catch (Exception $e) {
        var_dump($e->getMessage());
    }

