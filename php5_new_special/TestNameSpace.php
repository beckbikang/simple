<?php
namespace beck\space1;
class Beck{
    public function hello()
    {
        echo " hi beck \n";
    }
}
$b = new Beck();
$b->hello();

var_dump(__NAMESPACE__);
namespace beck\space2;
class Tom{
    public function hello()
    {
        echo " hi tom \n";
    }
}
