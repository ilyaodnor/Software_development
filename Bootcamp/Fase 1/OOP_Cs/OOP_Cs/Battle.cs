using System;
using System.Collections.Generic;
using System.Threading;

namespace OOP_Cs
{
    public class Trainer
    {
        public string Naam { get; set; }
        public Pokeballen Pokeballen { get; set; }

        public Trainer(string trainerNaam)
        {
            Naam = trainerNaam;
            Pokeballen = new Pokeballen();
        }

        public void ToonPokemons()
        {
            Console.WriteLine($"{Naam} heeft de volgende pokemons:");
            foreach (var pokemon in Pokeballen.Pokebals)
            {
                Console.WriteLine($"- {pokemon.Naam} (Type: {pokemon.Type})");
            }
        }
    }

    
    class Arena
    {
        public static int TotaalRondes { get; private set; } = 0;
        public static int TotaalBattles { get; private set; } = 0;

        public static void StartBattle(Trainer trainer1, Trainer trainer2)
        {
            TotaalBattles++; // Update score
            Battle battle = new Battle(trainer1, trainer2);
            string winnaar = battle.StartBattle();
            ToonScore(winnaar);
        }

        public static void ToonScore(string winnaar)
        {
            Console.WriteLine("\n----- SCOREBOARD -----");
            Console.WriteLine($"Aantal rondes gespeeld: {TotaalRondes}");
            Console.WriteLine($"Aantal gevechten gespeeld: {TotaalBattles}");
            if (winnaar == "nw")
            {
                Console.WriteLine("Dat was gelijk spel.");
            }
            else
            {
                Console.WriteLine($"Laatste winnaar: {winnaar}");
            }
            Console.WriteLine("----------------------\n");
        }
    class Battle
    {
        public Trainer Trainer1 { get; set; }
        public Trainer Trainer2 { get; set; }

        public Battle(Trainer trainer1, Trainer trainer2)
        {
            Trainer1 = trainer1;
            Trainer2 = trainer2;
        }

       public string StartBattle()
        {
    Console.WriteLine($"De strijd tussen {Trainer1.Naam} en {Trainer2.Naam} begint!");

    Pokemon vorigeWinnaar = null;
    while (Trainer1.Pokeballen.Pokebals.Count > 0 && Trainer2.Pokeballen.Pokebals.Count > 0)
    {
           
            if (Trainer1.Pokeballen.Pokebals.Count == 1 && Trainer2.Pokeballen.Pokebals.Count == 1 &&
                Trainer1.Pokeballen.Pokebals[0].Naam == Trainer2.Pokeballen.Pokebals[0].Naam)
            {
                Console.WriteLine($"Beide trainers hebben nog een {Trainer1.Pokeballen.Pokebals[0].Naam} over. Het is een gelijkspel!");
                return "nw";
            }

            Console.Clear();

            int randomKey1 = new Random().Next(0, Trainer1.Pokeballen.Pokebals.Count);
            Pokemon pokemon1 = Trainer1.Pokeballen.Pokebals[randomKey1];

            int randomKey2 = new Random().Next(0, Trainer2.Pokeballen.Pokebals.Count);
            Pokemon pokemon2 = Trainer2.Pokeballen.Pokebals[randomKey2];

            Trainer1.Pokeballen.GooiPokeballen(pokemon1, Trainer1);
            Thread.Sleep(1000);
            Trainer2.Pokeballen.GooiPokeballen(pokemon2, Trainer2);
            Thread.Sleep(1000);

            Console.WriteLine(new string('-', 10));

            Arena.TotaalRondes++;

            // Battle logic
            if (pokemon1.Strength == pokemon2.Type)
            {
                Console.WriteLine($"{pokemon1.Naam} verslaat {pokemon2.Naam}!");
                Trainer2.Pokeballen.Pokebals.Remove(pokemon2);
                vorigeWinnaar = pokemon1;
            }
            else if (pokemon2.Strength == pokemon1.Type)
            {
                Console.WriteLine($"{pokemon2.Naam} verslaat {pokemon1.Naam}!");
                Trainer1.Pokeballen.Pokebals.Remove(pokemon1);
                vorigeWinnaar = pokemon2;
            }
            else
            {
                Console.WriteLine($"De strijd tussen {pokemon1.Naam} en {pokemon2.Naam} is een gelijkspel!");
                if (vorigeWinnaar != null)
                {
                    Console.WriteLine($"{vorigeWinnaar.Naam} wordt teruggestuurd naar zijn pokeball.");
                }
                else
                {
                    Console.WriteLine("Beide Pokémon worden teruggestuurd naar hun pokeballs.");
                }
            }

            Console.WriteLine($"{Trainer1.Naam} heeft nog {Trainer1.Pokeballen.Pokebals.Count} pokebals.");
            Console.WriteLine($"{Trainer2.Naam} heeft nog {Trainer2.Pokeballen.Pokebals.Count} pokebals.");
            Console.WriteLine(new string('-', 10));
            Console.WriteLine("Druk op een toets om verder te gaan...");
            Console.ReadLine();
    }

    if (Trainer1.Pokeballen.Pokebals.Count > 0) 
    {
        Console.WriteLine($"{Trainer1.Naam} heeft de strijd gewonnen!"); 
        return Trainer1.Naam;
    }
    else
    { 
        Console.WriteLine($"{Trainer2.Naam} heeft de strijd gewonnen!"); 
        return Trainer2.Naam;
    }
}
}

            
        }
    }


