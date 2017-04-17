<?php

namespace PaoloDavila\TodosBackend\Transformers;

use PaoloDavila\TodosBackend\Exceptions\IncorrectModelException;

class UserTransformer extends Transformer
{
    public function transform($resource)
    {
        if (!$resource instanceof \PaoloDavila\TodosBackend\Task) {
            throw new IncorrectModelException();
        }

        return [
            'name'      => $resource['name'],
            'email'     => $resource['email'],
        ];
    }
}
