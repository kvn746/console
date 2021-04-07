<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Question\ChoiceQuestion;

class UserDataCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('user_data')
            ->setDescription('interactive user data')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');

        $question = new Question(iconv("UTF-8","CP1251", "Введите Ваше имя: "), 'AcmeDemoBundle');
        $name = $helper->ask($input, $output, $question);

        $question = new Question(iconv("UTF-8","CP1251", "Введите Ваш возраст: "), 'AcmeDemoBundle');
        $age = $helper->ask($input, $output, $question);

        $question = new ChoiceQuestion(
            iconv("UTF-8","CP1251", "Укажите Ваш пол"),
            [iconv("UTF-8","CP1251", "М"), iconv("UTF-8","CP1251", "Ж")],
            0
        );
        $question->setErrorMessage(iconv("UTF-8","CP1251", "Неправильное значение при выборе пола"));
        $gender = $helper->ask($input, $output, $question);

        $string = iconv("UTF-8","CP1251", "Здравствуйте, ");
        $string .= $name;
        $string .= iconv("UTF-8","CP1251", ", Ваш возраст: ");
        $string .= (int) $age;
        $string .= iconv("UTF-8","CP1251", ", Ваш пол: ");
        $string .= $gender;
        $output->writeln($string);

        return Command::SUCCESS;
    }
}