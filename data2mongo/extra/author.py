name = ['Sanjeev Saxena',
		'Juha Honkala',
		'Siegfried Bublitz',
		'Karl Meinke',
		'Ryszard Janicki',
		'Rudolf Berghammer',
		'Astrid Kiehn',
		'Ekkart Kindler',
		'Pedro V. Silva',
		'Beverly A. Sanders',
		'Changwook Kim',
		'Wim H. Hesselink',
		'K. V. S. Ramarao',
		'Hsien-Kuei Hwang',
		'Róbert Szelepcsényi',
		'Lawrence T. Kou',
		'Gheorghe Paun',
		'Naoki Kobayashi 0001',
		'Kung-Kiu Lau',
		'J. D. Godolphin',
		'Matthew S. Johnson',
		'Saralees Nadarajah',
		'Alan D. Hutson',
		'Peter Winker',
		'Peter Zörnig',
		'Howard L. Weinert',
		'Ji-Hyun Kim',
		'Salvador Flores',
		'Ingelin Steinsland',
		'Olcay Arslan',
		'D. S. G. Pollock',
		'Marco J. Lombardi',
		'Harry Joe',
		'Patrick Marsh',
		'Yury P. Shimansky',
		'Andrew G. Glen',
		'Lior Rokach',
		'Xiaomi Hu',
		'Peter Congdon',
		'Henning Fernau',
		'Dexter O. Cahoy',
		'Levent V. Orman',
		'Yue Fang',
		'Alexander Meduna',
		'A. R. Rasekh']

var at='@gmail.com'

outf=open('author.tsv', "w")
var i=1
for i in 50:
	author_id = i
	author_name = name[i]
	email = name+at
    rec =  str(author_id) + '\t' + str(author_name) + '\t' + str(email) 
    outf.write(rec)


outf.close()

print '\n-\n==================================================\n'


