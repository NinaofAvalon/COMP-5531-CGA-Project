
Maureen Adelson
40030871
COMP 5361

Assignment 1
# Question 1

#get a string from a user 
string = input()
#loop through the string + increment counter for every character in the string
counter=0;
for c in string:
  counter= counter+1
#display the number of characters
print("This string contains",counter,"characters");

# Question 2

#arbitrary piece of text
text = "";

#break text into words and store them into an array
words =text.split();
counter=0;

#loop through the words array to count the words that start with 'a' or 'A
for w in words:
  if w[0] == 'a':
    counter= counter+1
  if w[0] == 'A':
      counter= counter+1 

#display how many start with the character 'a'
print("This string contains", counter, "word(s) that start with the character 'a'")

# Question 3

text="is moist Wisnlet tish"
counter=0
#break the string into words and store them into an array
words =text.split()
  
#loop through the words array and then loop through the letters in the word
for word in words:
 i=0
 while i<len(word):
     if word[i]== 'i' and word[i+1]=='s':
        counter= counter+1
     i= i+1

#display
print("This text has the substring 'is':", counter,"times")

# Question 4

#array that contains values that make P(x) true
results = []
#loop to go through -1 to 10 
for x in range(-1,11):
  if ((x*x)-1 <10):
    results.append(x)
#display results
print(results)

