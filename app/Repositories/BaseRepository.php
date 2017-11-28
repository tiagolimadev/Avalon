<?php

namespace App\Repositories;

use Carbon\Carbon;

abstract class BaseRepository
{
    protected $modelClass;

    protected function novaQuery()
    {
        return app($this->modelClass)->newQuery();
    }

    public function gerarQuery($query = null, $limite = 15, $paginacao = true)
    {
        if (is_null($query)) {
            $query = $this->novaQuery();
        }

        if ($paginacao == true) {
            return $query->paginate($limite);
        }

        if ($limite > 0 || false !== $limite) {
            $query->take($limite);
        }

        return $query->get();
    }

    public function todos($limite = 15, $pginacao = true)
    {
        return $this->gerarQuery(null, $limite, $paginacao);
    }

    public function buscar($id)
    {
        return $this->novaQuery()->withTrashed()->find($id);
    }

    public function inserir($dados)
    {
        if (\is_object($dados)) {
            $dados = (array) $dados;
        }
        $dados['created_at'] = Carbon::now()->toDateTimeString();

        return $this->novaQuery()->create($dados);
    }

    public function atualizar($dados, $id)
    {
        return $this->buscar($id)->update($dados);
    }

    public function remover($id)
    {
        return $this->buscar($id)->delete();
    }

    public function restaurar($id)
    {
        return $this->buscar($id)->restore();
    }
}
