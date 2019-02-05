import csv

# save the json output as emp.json 
jsfile = open('author.json', 'w')
jsfile.write('[\r\n')

with open('author.tsv','r') as f:
    next(f) # skip headings
    reader=csv.reader(f,delimiter='\t')

    # get the total number of rows excluded the heading
    row_count = len(list(reader))
    ite = 0

    # back to first position
    f.seek(0)
    next(f) # skip headings
    
    for author_id,author_name in reader:

        ite+= 1
        
        jsfile.write('\t{\r\n')
        
        
        i = '\t\t\"author_id\": \"' + author_id + '\",\r\n'
        n = '\t\t\"author_name\": \"' + author_name + '\"\r\n'
       
        jsfile.write(n)
        jsfile.write(i)
        

        jsfile.write('\t}')

        # omit comma for last row item
        if ite < row_count:
            jsfile.write(',\r\n')

        jsfile.write('\r\n')

jsfile.write(']')
jsfile.close()