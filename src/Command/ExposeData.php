<?php 
namespace App\Command;

use App\Entity\Factory\FileFactory;
use App\Service\Parser;
use Symfony\Component\Console\{
  Command\Command,
  Attribute\AsCommand
};

use Symfony\Component\Console\Input\{
  InputArgument,
  InputInterface
};
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
  name: 'expose',
  description: 'Expose data to array',
  hidden: false,
  aliases: ['expose']
)]
class ExposeData extends Command
{
  protected function configure(): void
  {
    $this->addArgument('file', InputArgument::REQUIRED, 'File to convert');
  }

  public function execute(InputInterface $input, OutputInterface $output): int
  {
    $file = $input->getArgument('file');

    try {
      $fileFactory = new FileFactory();
      print_r(Parser::execute($fileFactory->create($file)));
    } catch(\Throwable $e) {
      $output->writeln($e->getMessage());
      return Command::FAILURE;
    }

    $output->writeln("Exposed file");
    return Command::SUCCESS;
  }
}