<?php
// 开闭原则违反案例
class Programmer
{
    public function code()
    {
        return 'coding';
    }
}

class Tester
{
    public function test()
    {
        return 'testing';
    }
}

class ProjectManagement
{
    public function process($user)
    {
        if ($user instanceof Programmer) {
            $user->code();
        } elseif ($user instanceof Tester) {
            $user->test();
        };
        throw new Exception('无效输入用户');
    }
}

// 重构优化 
// 如果我新增了一个新的Design类并且要在process方法中用到的话，就需要在ProjectManagement类中去修改类（如加上一个elseif 判断）而通过下面的代码，就可很好的解决这个问题
interface Workable
{
    public function work();
}

class Programmer implements Workable
{
    public function work()
    {
        return 'coding';
    }
}

class Tester implements Workable
{
    public function work()
    {
        return 'testing';
    }
}

class ProjectManagement
{
    public function process(Workable $user)
    {
        return $user->work();
    }
}