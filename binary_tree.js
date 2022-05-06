// const tree ={
//     value: 10,
//     left: {
//         value: 8,
//         left: null,
//         right: null
//     },
//     right:{
//         value: 11,
//         left: {
//             value: 12,
//             left: null,
//             right: null
//         }
//     }
// }

class Node {
    constructor(value) {
        this.value = value;
        this.left = null;
        this.right = null;
    }
}

class BinaryTree {
    constructor() {
        this.root = null;
    }

    add(value) {
        const newNode = new Node(value)
        if (!this.root) {
            this.root = newNode;
            return true;
        }

        let currentNode = this.root;

        while (currentNode) {
            if (newNode.value < currentNode.value) {
                if (!currentNode.left) {
                    currentNode.left = newNode;
                    return;
                }

                currentNode = currentNode.left;
            } else {
                if (!currentNode.right) {
                    currentNode.right = newNode;
                    return;
                }

                currentNode = currentNode.right;
            }
        }
    }

    preOrder(node, callback) {
        if (!node){
            return;
        }
        if (callback){
            callback(node);
        }

        this.preOrder(node.left, callback);
        this.preOrder(node.right, callback);
    }

    postOrder(node, callback) {
        if (!node){
            return;
        }

        this.postOrder(node.left, callback);
        this.postOrder(node.right, callback);

        if (callback){
            callback(node);
        }
    }

    inOrder(node, callback) {
        if (!node){
            return;
        }

        this.inOrder(node.left, callback);
        if (callback){
            callback(node);
        }
        this.inOrder(node.right, callback);
    }

    traverseDFS(callback, method) {
        if (method === 'preOrder') {
            return this.preOrder(this.root, callback);
        }
        if (method === 'inOrder'){
            return this.inOrder(this.root, callback);
        }
        if (method === 'postOrder'){
            return this.postOrder(this.root, callback)
        }
    }

    traverseBFS(callback) {
        const queue =[this.root];

        while (queue.length){
            const node =queue.shift();
            callback(node);

            if (node.left){
                queue.push(node.left);
            }
            if (node.right){
                queue.push(node.right);
            }
        }
    }
}

const myTree = new BinaryTree();
console.log(myTree);
myTree.add(10);
myTree.add(6);
myTree.add(11);
myTree.add(13);
myTree.add(5);
myTree.add(1);
myTree.add(14);
myTree.add(20);
myTree.add(16);

// 10, 6, 5, 1, 11, 13, 14, 20, 16
myTree.traverseDFS((node)=>{
    console.log(node.value)
}, 'preOrder');

// 1, 5, 6, 10, 11, 13, 14, 16, 20,
// myTree.traverseDFS((node)=>{
//     console.log(node.value)
// }, 'inOrder');

// 1, 5, 6, 16, 20, 14, 13, 11, 10,
//     myTree.traverseDFS((node)=>{
//     console.log(node.value)
// }, 'postOrder');

// 10, 6, 11, 5, 13, 1, 14, 20, 16,
// myTree.traverseBFS((node)=>{
//     console.log(node.value)
// });