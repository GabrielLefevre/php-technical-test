<?php
/**
 * Created by PhpStorm.
 * User: presh
 * Date: 07/04/2019
 * Time: 16:01
 */

namespace App\Tests\Controller;


use App\Controller\RunningController;
use App\Repository\RunningRepository;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response;

class RunningControllerTest extends TestCase
{

    public function testIndex() {

        $controller = $this->createMock(RunningController::class);

        $runningRepo = $this->createMock(RunningRepository::class);

        $response = $controller->index($runningRepo);

        $this->assertEquals($this->createMock(Response::class),$response);
    }

}