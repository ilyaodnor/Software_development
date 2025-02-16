namespace OOP_Cs
{
    public abstract class Pokemons(
        string naam,
        string geluid,
        Pokemons.Strengths strength,
        Pokemons.Weaknesses weakness,
        Pokemons.Charecterstype type)
    {
        public enum Strengths
        {
            Fire,
            Water,
            Grass,
        }
        public enum Weaknesses
        {
            Fire,
            Water,
            Grass,
        }
        public enum Charecterstype
        {
            Fire,
            Water,
            Grass,
        }

        public string Naam { get; } = naam;
        public string Geluid { get;} = geluid;
        public Strengths Strength { get; } = strength;
        public Weaknesses Weakness { get;} = weakness;
        public Charecterstype  CharectersType{ get;} = type;

        public abstract void BattleCry();
    }
    class Bulbasaur : Pokemons
    {
        public Bulbasaur() : base("Bulbasaur", "Bulbasaur!", Pokemons.Strengths.Water, Pokemons.Weaknesses.Fire, Charecterstype.Grass)
        {
        }

        public override void BattleCry()
        {
            Console.WriteLine($"{Naam}: {Geluid}");
        }
    }

    class Charmander : Pokemons
    {
        public Charmander() : base("Charmander", "Charmander!", Pokemons.Strengths.Grass, Pokemons.Weaknesses.Water,
            Charecterstype.Fire)
        {
        }

        public override void BattleCry()
        {
            Console.WriteLine($"{Naam}: {Geluid}");
        }
    }
    class Squirtle : Pokemons
    {
        public Squirtle() : base("Squirtle", "Squirtle!", Strengths.Fire, Weaknesses.Grass, Charecterstype.Water)
        {
        }

        public override void BattleCry()
        {
            Console.WriteLine($"{Naam}: {Geluid}");
        }
    }
    public sealed class Pokeballen
    {
        public List<Pokemons> Pokebals { get; set; }
        private const int MaxPokeballs = 6;

        public Pokeballen()
        {
            Pokebals = new List<Pokemons> { new Squirtle(), new Bulbasaur(), new Charmander(),  new Squirtle(), new Bulbasaur(), new Charmander() };
        }

        public void GooiPokeballen(Pokemons pokemons, Trainer trainer)
        {
            Console.WriteLine($"{trainer.Naam} gooit een pokebal!");
            Thread.Sleep(1000);
            Console.WriteLine($"Verschijnt uit de pokebal: {pokemons.Naam}");
            pokemons.BattleCry();
        }
    }
}