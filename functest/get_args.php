<?php

function hi()
{
    print_r(func_get_args());
    print_r(func_num_args());

}
class Test{}
hi(array(1,2,3),array(1231),new Test());

