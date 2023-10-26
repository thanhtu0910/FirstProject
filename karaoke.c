#include<stdio.h>
int main() {
	  float a,b,time, giaTien,gia; 
	  a>=12;
	  b<=23;
	printf("xin moi nhap thoi gian bat dau a: ") ;
	scanf("%f",&a);
	printf("xin moi nhap thoi gian ket thuc b: ") ;
	scanf("%f",&b);
	time=b-a; 
	if(time<=3) {
		giaTien= time*150000;
	}else {
		gia=150000-(150000*30)/100; 
		giaTien=3*150000+((time-3)*gia); 
	}
	if(a>=14 && a<=17) { 
		giaTien=giaTien-(giaTien*10)/100 ;
	}
	printf("tong gia tien ban can thanh toan la: %.1f",giaTien) ;
	
	return 0;
}
