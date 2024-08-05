<?php

namespace App\Livewire;

use Livewire\Attributes\Rule;
use Livewire\Component;

class Todos extends Component
{
    #[Rule(
        rule: ['required', 'min:6'],
        as: 'TODO',
        message: [
            'required' => ':attribute は必須です。',
            'min' => ':attribute は :min 文字以上で入力してください。',
        ]
    )]
    public $todo = '';

    #[Rule(
        rule: ['required', 'in:low,medium,high'],
        as: '優先度',
        message: [
            'required' => ':attribute は必須です。',
            'in' => ':attribute は low, medium, high のいずれかで入力してください。',
        ]
    )]
    public $priority = '';

    public $todos = [];

    public function updatedTodo()
    {
        // dd($this->todo);
    }

    public function add()
    {
        // $this->validate();
        if ($this->todo === '') {
            session()->flash('error', 'TODOを入力してください。');
            return;
        }

        $this->todos[] = $this->todo;

        $this->reset('todo');
    }

    public function render()
    {
        return view('livewire.todos');
    }
}
