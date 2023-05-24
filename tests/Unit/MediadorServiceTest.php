<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use App\Services\MediadorService;
use App\Models\Mediador;
use Database\Seeders\MediadorSeeder;
use Mockery;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class MediadorServiceTest extends TestCase
{
    /**
     * A basic test example.
     */

     use RefreshDatabase;

    public function test_show_mediators(): void
    {
     

        // $mediador = $this->createMock(Mediador::class);

        // // Definir el comportamiento esperado del repositorio mock
        // $mediador->expects($this->once())
        //     ->method('all')
        //     ->willReturn(['John Doe', 'Jane Smith', 'Lionel Messi']);
        
        $this->seed(MediadorSeeder::class);

        $mediadorService = new MediadorService();
        $mediadores = $mediadorService->getAll();
        $this->assertCount(3, $mediadores);
        $this->assertTrue(true);
    }
}
