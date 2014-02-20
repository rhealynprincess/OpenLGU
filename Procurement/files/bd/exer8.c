#include <stdio.h>
#include <stdlib.h>
#include <pthread.h>

void *produce(void *i);
void *consume(void *i);
pthread_mutex_t mutex[5] = PTHREAD_MUTEX_INITIALIZER; //everytime you create mutex, intialze with PTHREAD_MUTEX_INITIALIZER
pthread_mutex_t condition_mutex = PTHREAD_MUTEX_INITIALIZER;
pthread_cond_t condition_cond = PTHREAD_COND_INITIALIZER; 
int  counter = 0;
int buffer[5];
main(int argc, char **argv)
{
   int rc1, rc2;
   int num_of_producers;
   int num_of_consumers;
	
	int *ret1; //gets the return value of pthread_create
	int *ret2;
	int i,j;
	int *index;
   pthread_t *producer_thread, *consumer_thread;
   pthread_t thread1, thread2;
   //printf("Number of arguments : %d\n", argc);
   
   num_of_producers= atoi(argv[1]);
   num_of_consumers= atoi(argv[2]);
   printf("Number of Producers : %d\n", num_of_producers);

	producer_thread=(pthread_t *)malloc(sizeof(pthread_t)*num_of_producers);
   printf("Number of Consumers : %d\n", num_of_consumers);
	consumer_thread=(pthread_t *)malloc(sizeof(pthread_t)*num_of_consumers);
	
	ret1=(int *)malloc(sizeof(int)*num_of_producers);
	ret2=(int *)malloc(sizeof(int)*num_of_consumers);
   /* Create independent threads each of which will execute functionC */
	for(i=0;i<5;i++){
		buffer[i]=-1;
	}
while(1){
   for(i=0;i<num_of_producers;i++){
   	index= &i;
   	ret1[i]=pthread_create( &producer_thread[i], NULL, &produce, (void *) index);
   }
   for(i=0;i<num_of_consumers;i++){
   	index= &i;
   	ret2[i]=pthread_create( &consumer_thread[i], NULL, &consume, (void *) index);
   }





   /* Wait till threads are complete before main continues. Unless we  */
   /* wait we run the risk of executing an exit which will terminate   */
   /* the process and all threads before the threads have completed.   */
	
	for(i=0;i<num_of_producers;i++){
		pthread_join(producer_thread[i], NULL);
   }
   for(i=0;i<num_of_consumers;i++){
   	pthread_join(consumer_thread[i], NULL);
   }
	sleep(5);
}
   exit(0);
}
//help: lock the mutex if the produce(), unlock if consume
void *produce( void *i){
	int * index;
	int num=rand()%10;
	int buff_index;
	index= (int *) i;
	//while(1){
	buff_index=rand()%5;
	/*
	pthread_mutex_lock(&condition_mutex);
	if(buffer[buff_index]>=0){
		pthread_cond_wait(&condition_cond, &condition_mutex);	
	}
	pthread_mutex_unlock(&condition_mutex);	
	*/
	pthread_mutex_lock( &mutex[buff_index]);
	if(buffer[buff_index]==-1){
	
   	printf("Producer %d produced %d at %d\n", *index, num, buff_index);
	buffer[buff_index]=num;
   	
	}
	pthread_mutex_unlock( &mutex[buff_index]);

	//}
}
void *consume(void * i){
	int *index;
	index= (int *) i;
	int buff_index;
	//while(1){
	buff_index=rand()%5;
	/*
	pthread_mutex_lock(&condition_mutex);
	if(buffer[buff_index]>=0){
		pthread_cond_signal(&condition_cond);	
	}
	pthread_mutex_unlock(&condition_mutex);	
	*/
	pthread_mutex_lock( &mutex[buff_index]);
	if(buffer[buff_index]!=-1){
	
	printf("Consumer %d consumed %d at %d\n", *index, buffer[buff_index], buff_index);
	buffer[buff_index]=-1;
	
   	}
	pthread_mutex_unlock( &mutex[buff_index]);
	//}
   
}
