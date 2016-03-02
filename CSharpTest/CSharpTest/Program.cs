using System;
namespace CSharpTest
{
	class Program
	{
		public static void Main(string[] args)
		{
			Person taro = new Person("Taro", 30);
			string taro_data = taro.getData();
			
			Person hanako = new Person("Hanako");
			string hanako_data = hanako.getData();
			
			Person noname = new Person(123);
			string noname_data = noname.getData();
			
			Console.WriteLine(taro_data);
			Console.WriteLine(hanako_data);
			Console.WriteLine(noname_data);
			
			Console.ReadKey();
		}
	}
	
	class Person
	{
		public string name;
		public int age;
		
		public Person()
		{
			name = "no name...";
			age = 0;
		}
		
		public Person(string s)
		{
			name = s;
			age = 0;
		}
		
		public Person(int n)
		{
			name = "no name...";
			age = n;
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
}