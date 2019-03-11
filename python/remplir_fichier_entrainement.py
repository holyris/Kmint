# -*- coding: ISO-8859-1 -*-
from textblob import TextBlob
#import du classifieur
from textblob.classifiers import NaiveBayesClassifier
from nltk.corpus import stopwords
import mysql.connector
import csv
import re
import codecs
from nltk.tokenize import word_tokenize, sent_tokenize

stop = stopwords.words("french")
stop.append("les")
stop.append("a")
stop.append("nous")

conn = mysql.connector.connect(host="localhost",user="kmint",password="kmint123", database="kmint")
cursor = conn.cursor()
cursor.execute("SELECT Concat_ws(' ',titre, description), categorie FROM petition_300 WHERE categorie != 'NULL' LIMIT 3000 OFFSET 3001")
result = cursor.fetchall()

csv.register_dialect('myDialect',
delimiter = ',',
quoting=csv.QUOTE_ALL,
skipinitialspace=True)

with open('petitions_train.csv', 'w', newline='', encoding="utf-8") as writeFile:
   writer = csv.writer(writeFile, dialect='myDialect')
   for x in result:
      x = list(x)
      for i, z in enumerate(x):
         z = z.lower()
         x[i] = word_tokenize(z)
         x[i] = [w for w in x[i] if not w in stop]
         z = ' '.join(x[i])
         z = z.replace('\n', '')
         z = re.sub(r'[^\w\s]',' ', z)
         x[i] = re.sub(' +', ' ', z)
      x = tuple(x)
      writer.writerow(x)

"""
# pour save le classifieur
with open('petitions_train.csv', 'w', newline='', encoding="utf-8") as fp:
   cl = NaiveBayesClassifier(fp, format="csv")
   object = cl
   file = open('classifieur.obj', 'wb')
   pickle.dump(object, file)	  
"""
conn.close()