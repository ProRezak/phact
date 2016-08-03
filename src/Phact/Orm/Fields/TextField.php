<?php
/**
 *
 *
 * All rights reserved.
 *
 * @author Okulov Anton
 * @email qantus@mail.ru
 * @version 1.0
 * @company HashStudio
 * @site http://hashstudio.ru
 * @date 15/04/16 13:56
 */

namespace Phact\Orm\Fields;


class TextField extends CharField
{
    public function getSqlType()
    {
        return "TEXT";
    }
}