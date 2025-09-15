<?php
class RouterController extends BaseController
{
    public function __construct()
    {
    }

    public function Go($link): void
    {
        if (empty($link)) {
            $this->render('./');
            return;
        }
        $this->render($link);
    }
}
