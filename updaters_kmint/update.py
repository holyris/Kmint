# -*- coding: ISO-8859-1 -*-
from textblob import TextBlob
from textblob.classifiers import NaiveBayesClassifier
from nltk.corpus import stopwords
import mysql.connector
import csv
import re
import codecs
from nltk.tokenize import word_tokenize, sent_tokenize
import pickle

conn = mysql.connector.connect(host="localhost",user="kmint",password="kmint123", database="kmint")
conn_update = mysql.connector.connect(host="localhost",user="kmint",password="kmint123", database="kmint")
cursor = conn.cursor()
cursor_update = conn_update.cursor(prepared=True);

with open('petitions_train.csv', 'r', encoding="utf-8") as fp:
	cl = NaiveBayesClassifier(fp, format="csv")
	cursor.execute("SELECT Concat_ws(' ',titre, description), lien FROM petition WHERE categorie IS NULL")
	result = cursor.fetchone()
	while result is not None:
		lien = result[1]
		blob = TextBlob(result[0], classifier=cl)
		prob_dist = cl.prob_classify(result[0])
		categorie = prob_dist.max()
		if (prob_dist.prob(prob_dist.max()) < 0.2):
			categorie = 'autres'
		sql = """UPDATE petition SET categorie = %s WHERE lien = %s"""
		input = (categorie, lien)
		cursor_update.execute(sql, input)
		conn_update.commit()
		result = cursor.fetchone()

conn.close()
conn_update.close()


