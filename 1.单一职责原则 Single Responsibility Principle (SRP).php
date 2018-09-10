<?php
// 单一责任原则违反案例
class User
{
    public function getRealname()
    {
        return '人员姓名';
    }

    public function getBirthday()
    {
        return '2016-04-21';
    }

    public function getContent()
    {
        return [
            'realname' => $this->getRealname(),
            'birthday' => $this->getBirthday(),
        ];
    }

    public function formatJson()
    {
        return json_encode($this->getContent());
    }
}

// 重构优化 formatJson 不属于用户模型中的函数 抽象成接口 模型类和格式处理类区分
class User
{
    public function getRealname()
    {
        return '人员姓名';
    }

    public function getBirthday()
    {
        return '2016-04-21';
    }

    public function getContent()
    {
        return [
            'realname' => $this->getRealname(),
            'birthday' => $this->getBirthday(),
        ];
    }
}

interface UserFormat
{
    public function format(User $user);
}

class JsonUserFormatter implements UserFormat
{
    public function format(User $user)
    {
        return json_encode($user->getContent());
    }
}