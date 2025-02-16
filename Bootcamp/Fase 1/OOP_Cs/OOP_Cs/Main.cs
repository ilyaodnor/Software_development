using System;

namespace OOP_Cs
{
    class Program
    {
        static void Main()
        {
            Console.WriteLine("Welkom bij Pokémon Battle!");
            Console.Write("Naam van eerste trainer: ");
            string? trainerNaam1 = Console.ReadLine();

            Console.Write("Naam van tweede trainer: ");
            string? trainerNaam2 = Console.ReadLine();

            if (trainerNaam1 != null)
            {
                var trainer1 = new Trainer(trainerNaam1);
                if (trainerNaam2 != null)
                {
                    var trainer2 = new Trainer(trainerNaam2);

                    trainer1.ToonPokemons();
                    trainer2.ToonPokemons();
                    Console.WriteLine("Druk op een toets om verder te gaan...");
                    Console.ReadLine();

                    Arena.StartBattle(trainer1, trainer2);
                }
            }
        }
    }
    
}