<?php
require __DIR__ . '/vendor/autoload.php';

$container = new Pimple\Container();

//nxnx.net-helper - required
$container['nxnx.net-helper'] = function() {
    $net = new NetHelper\Service\Net();

    $curl_version = curl_version();
    $net->setUserAgent('curl/' . $curl_version['version']); //optional

    return $net;
};

//Parser service
$container['nxnx.spec-parser'] = function($c) {
    return new SpecParser\Service\Parser($c);
};

//dDefine entity.
class TitleEntity {

    /**
     * HTML title
     * @var string test variable
     */
    protected $var;

    /**
     * Get HTML title
     * @param string $var
     * @return \static
     */
    public function setVar($var) {
        $this->var = $var;
        return $this;
    }

    /**
     * Get HTML title
     * @return string
     */
    public function getVar() {
        return $this->var;
    }

}

//Define task for parser. For help see class "SpecParser\ParserTask\AbstractTask"
class TestTask extends SpecParser\ParserTask\AbstractTask {

    /**
     * @var boolean
     */
    protected $fake = false;

    /**
     * {@inheritDoc}
     */
    public function getParseRules() {
        $css = $this->fake ?
                'html > title > h1' : //fake css
                'html > head > title'; //correct for github

        return [
                ['var', $css, 'string'], //in our example only 1 rule
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getClassName() {
        return TitleEntity::class;
    }

    public function setFake($fake = true) {
        $this->fake = (bool) $fake;
    }

}

//data for display here
$results = [
    'entity' => [], //parsing result
    'errors' => []//errrors
];

$task = new TestTask;

$url = 'https://github.com'; //target url

try {

    //loop is just for demonstrate an error handling
    for ($i = 0; $i <= 1; $i++) {
        $task->setFake($i); //last iteration will be failed
        $result = $container['nxnx.spec-parser']->execute($task, ['url' => $url]);
        $results['entity'][] = $result;
    }
} catch (Exception $e) {
    $results['errors'][] = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Parsing test</title>
    </head>
    <body>

        <h1>Result for <a target="_blank" href="<?= $url; ?>"><?= htmlspecialchars($url); ?></a>:</h1>

        <?php foreach ($results['entity'] as $entity) : ?>
            <p>HTML title: <span style="color:green"><?= $entity->getVar(); ?></span></p>
        <?php endforeach; ?>

        <h2>Errors:</h2>

        <?php foreach ($results['errors'] as $error) : ?>
            <p style="color:red"><?= $error; ?></p>
        <?php endforeach; ?>
    </body>
</html>