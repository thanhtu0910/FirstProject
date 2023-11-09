#include<iostream>
using namespace std;
 int main (){
 	int a;
	cout << "Please enter a number that can be divisible by 12: ";
    cin >> a;
 	if (a%12==0){
 		cout << "true";
	 } else {
	 	cout << "fail";
	 }
 }
