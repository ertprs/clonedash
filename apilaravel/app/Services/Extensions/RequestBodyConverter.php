<?php

namespace App\Services\Extensions;

use JMS\Serializer\Serializer;
use App\Services\Extensions\RequestBodyConverterInterface;

/**
 * @author Tiago Franco
 * Servico para processos de serializacao
 * de json para objetos e vice versa
 */
class RequestBodyConverter
{
    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    public function deserializer(RequestBodyConverterInterface $converter)
    {
        $className = get_class($converter);
        return $this->serializer->deserialize(request()->getContent(), $className, 'json');
    }

    public function deserializerConteudo(RequestBodyConverterInterface $converter, string $jsonConteudo)
    {
        $className = get_class($converter);
        return $this->serializer->deserialize($jsonConteudo, $className, 'json');
    }

    public function serializer(object $object)
    {
        return $this->serializer->serialize($object, 'json');
    }
}
