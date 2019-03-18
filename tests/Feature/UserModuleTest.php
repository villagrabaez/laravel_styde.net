<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserModuleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    function it_loads_the_users_list_page()
    {
        factory(User::class)->create([
            'name' => 'Julian'
        ]);

        $this->get('/users')
            ->assertStatus(200)
            ->assertSee('Lista de usuarios: ')
            ->assertSee('Bernardino')
            ->assertSee('Julian');
    }

    function it_loads_the_users_list_page_not_users()
    {
        $this->get('/users')
            ->assertStatus(200)
            ->assertSee('No hay usuarios registrados.');
    }

    /**
     * @test
     */

    function it_loads_the_users_details_page()
    {
        $user = factory(User::class)->create([
            'name' => 'Benardino'
        ]);

        $this->get('/users/'.$user->id)
            ->assertStatus(200)
            ->assertSee('Bernardino');
    }

    /**
     * @test
     */

    function it_loads_the_create_new_user_page()
    {
        $this->get('/users/nuevo')
            ->assertStatus(200)
            ->assertSee('Agregar usuario: ');
    }

    /**
     * @test
     */

    function it_loads_the_user_name()
    {
        $this->get('/users/usuario')
            ->assertStatus(200)
            ->assertSee('Hola Usuario. No tienes nickname');
    }

    /**
     * @test
     */

    function it_loads_the_user_name_and_nickname()
    {
        $this->get('/users/usuario/nickname')
            ->assertStatus(200)
            ->assertSee('Hola Usuario. Tu nickname es nickname'); 
    }
}
