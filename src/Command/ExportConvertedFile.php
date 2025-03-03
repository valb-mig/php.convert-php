<?php 
namespace App\Command;

use App\Entity\Factory\FileFactory;
use App\Service\Convert;
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
  name: 'export',
  description: 'Export file data to selected extension',
  hidden: false,
  aliases: ['export']
)]
class ExportConvertedFile extends Command
{
  protected function configure(): void
  {
    $this
      ->addArgument('file',      InputArgument::REQUIRED, 'File to convert')
      ->addArgument('extension', InputArgument::REQUIRED, 'Extension to format');
  }

  public function execute(InputInterface $input, OutputInterface $output): int
  {
    $file = $input->getArgument('file');
    $extension = $input->getArgument('extension');

    try {
      $fileFactory = new FileFactory();

      Convert::execute(
        $fileFactory->create($file), 
        $extension
      );
      
      $output->writeln('Converted');
      
    } catch(\Throwable $e) {
      $output->writeln($e->getMessage());
      return Command::FAILURE;
    }

    $output->writeln("File converted successfully!/n See '/public/files/converted'");
    return Command::SUCCESS;
  }
}