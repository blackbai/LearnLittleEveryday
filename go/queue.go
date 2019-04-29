package main

//实现原理
//

type MyCircularQueue struct {
	data []int
	head int
	tail int
	size int
}

//创建一个循环队列 设置头指针、尾指针
func Constructor(k int) MyCircularQueue {
	return MyCircularQueue{
		head:-1,
		tail:-1,
		size:k,
	}
}


/** Insert an element into the circular queue. Return true if the operation is successful. */
func (this *MyCircularQueue) EnQueue(value int) bool {
	if this.IsFull() == true{
		return false
	}

	if this.IsEmpty(){
		this.head = 0
	}

	this.tail = (this.tail + 1) % this.size
	this.data[this.tail] = value
	return true
}


/** Delete an element from the circular queue. Return true if the operation is successful. */
func (this *MyCircularQueue) DeQueue() bool {
	if this.IsEmpty() == true{
		return false
	}

	return true
}


/** Get the front item from the queue. */
func (this *MyCircularQueue) Front() int {

}


/** Get the last item from the queue. */
func (this *MyCircularQueue) Rear() int {

}


/** Checks whether the circular queue is empty or not. */
func (this *MyCircularQueue) IsEmpty() bool {

}


/** Checks whether the circular queue is full or not. */
func (this *MyCircularQueue) IsFull() bool {

}

