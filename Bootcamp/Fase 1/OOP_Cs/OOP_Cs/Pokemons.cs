namespace OOP_Cs
{
    public abstract class Pokemon(
        string naam,
        string geluid,
        Pokemon.Strengths strength,
        Pokemon.Weaknesses weakness,
        Pokemon.Charecterstype type)
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
}