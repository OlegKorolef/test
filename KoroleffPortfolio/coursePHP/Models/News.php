<?php

namespace Applications\Models;

use Applications\Classes\AbstractModel as AbstractModel;

/**
 * Class NewsModel
 * @property $id_0
 * @property $id
 * @property $day_
 * @property $month_
 * @property $year_
 * @property $heading
 * @property $path
 */

class News
    extends AbstractModel
{
    protected static $table = "news";
}