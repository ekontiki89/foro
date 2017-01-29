<?php

/**
 * Created by PhpStorm.
 * User: ekontiki
 * Date: 26/01/17
 * Time: 22:25
 */
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FeatureTestCase extends TestCase
{
    use DatabaseTransactions;
    public function seeErrors(array $fields)
    {
        foreach ($fields as $name => $errors) {
            foreach ((array) $errors as $message) {
                $this->seeInElement(
                    "#field_{$name}.has-error .help-block", $message
                );
            }
        }
    }

}