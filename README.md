# yii2-gii-templates
Templates used for generating code with Yii2 Gii

>To use the rest controller template
Add in gii config a new generators path
And Copy templates folder to common folder

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '192.168.*', '::1'],
        'generators' => [
            'controller'   => [
                'class'     => 'common\templates\controller\Generator',
            ]
        ]
    ];
