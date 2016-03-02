using System;
namespace CSharpTest
{
	class Program
	{
		public static void Main(string[] args)
		{
			Person taro = new Person("Taro", 30);
			string taro_data = taro.getData();			
			
			PowerPerson hanako = new PowerPerson("Hanako", 24, "hanako@flower", "070-7777-7777", "Tokyo, Japan");
			string hanako_data = hanako.getPowerData();
			
			Console.WriteLine(taro_data);
			Console.WriteLine(hanako_data);
			
			Console.ReadKey();
		}
	}
	
	class Person
	{
		internal string name;
		internal int age;

		public Person()
		{
			name = "no name...";
			age = 0;
		}
		
		public Person(string s, int n)
		{
			name = s;
			age = n;
		}
		
		public string getData()
		{
			string data = name + "(" + age + ")";
			return data;
		}
	}
	
	class PowerPerson : Person
	{
		string mail;
		string tel;
		string address;
		
		public PowerPerson(string name, int age, string mail, string tel, string address)
		{
			this.name = name;
			this.age = age;
			this.mail = mail;
			this.tel = tel;
			this.address = address;
		}
		
		public string getPowerData()
		{
			string res = name + " (" + age + ")  " + mail + ", " + tel + ", " + address;
			return res;
		}
	}
}